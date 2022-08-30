---
extends: _layouts.post
section: content
title: Minimum moves to make array complementary
problemUrl: https://leetcode.com/problems/minimum-moves-to-make-array-complementary/
date: 2022-08-30
categories: [array-and-hashmap]
---

First we create an overlay lookup hashmap of size 2*limit+2, as our minimum boundary of change is 2 and maximum is 2*limit. Then we iterate over the elements in pair, take the first and last element, and calculate the overlay value for the left and right boundary. Then we iterate over the input array, take the current move and add it to the overlay value, and keep track of a rolling minimum. We return the rolling minimum when the iteration is over.

```python
class Solution:
    def minMoves(self, nums: List[int], limit: int) -> int:
        n = len(nums)
        overlay = [0]*((2*limit)+2)
        for i in range(n//2):
            left_boundary = min(nums[i], nums[n-1-i]) + 1
            no_move_value = nums[i] + nums[n-1-i]
            right_boundary = max(nums[i], nums[n-1-i]) + limit
            
            overlay[left_boundary] -= 1
            overlay[no_move_value] -= 1
            overlay[no_move_value+1] += 1
            overlay[right_boundary+1] += 1
        
        current_moves = n
        res = math.inf
        for i in range(2, (2*limit)+1):
            current_moves += overlay[i]
            res = min(res, current_moves)
        return res
```

Time Complexity: `O(n+l)`, n is the number of items in the array, l is the limit
Space Complexity: `O(l)`