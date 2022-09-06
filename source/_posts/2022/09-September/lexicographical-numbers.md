---
extends: _layouts.post
section: content
title: Lexicographical numbers
problemUrl: https://leetcode.com/problems/lexicographical-numbers/
date: 2022-09-06
categories: [graph]
---

We can just create a list of numbers from 1 to n, convert them to string and sort them.

```python
class Solution:
    def lexicalOrder(self, n: int) -> List[int]:
        return sorted(range(1, n+1), key=str)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`

Also, we can create a decision tree from the numbers where we will take 1 element, put it to the next position of the number by multiply it by 10 and then add 0 to 9 numbers to have 10 different options. While traversing this decision tree, we will append each number to our result and return.

```python
class Solution:
    def lexicalOrder(self, n: int) -> List[int]:
        res = []
        
        def dfs(i):
            if i > n:
                return
            res.append(i)
            for j in range(10):
                dfs(i*10+j)
        
        for i in range(1, 10):
            dfs(i)
        
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
