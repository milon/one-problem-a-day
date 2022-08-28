---
extends: _layouts.post
section: content
title: Combinations
problemUrl: https://leetcode.com/problems/combinations/
date: 2022-08-28
categories: [backtracking]
---

This is classic backtracking problem.

For a given combination of values, you want only 1 tuple. You can achieve this by making sure that for 3 values a, b, c, that a < b < c. I implement this by limiting my search for potential future numbers to those numbers strictly greater than the current number.

By the above optimization, we will only entertain candidates greater than the current number. Therefore, if the remaining indices are greater than the number of candidate numbers left to place, you don't have to continue the for loop, and can break. A little translation from English to code: `"remaining squares" => "total squares - filled squares" => "k - len(arr)"`. Another translation: `"number of candidate numbers left to place" => "n - curr_num + 1"`. So all together you get `"if k - len(arr) > n - num + 1: break"`

To explain why it's +1, here's an example: if your current number to place is 19 and the max number you can place is 20, you can place 2 numbers, 19 and 20. You get this w/ 20 - 19 + 1

So the overall time complexity becomes nCk because the paths that don't lead to a correct output travel for an insignificant amount of time before being excluded, because of the second optimization listed.

```python
class Solution:
    def combine(self, n: int, k: int) -> List[List[int]]:
        res, arr = [], []
        
        def backtrack(prev):
            if len(arr) == k:
                res.append(arr.copy())
            for num in range(prev+1, n+1):
                if k-len(arr) > n-num+1:
                    break
                arr.append(num)
                backtrack(num)
                arr.pop()
                
        backtrack(0)
        return res
```

Time Complexity: `O(nCk)` <br/>
Space Complexity: `O(k)`