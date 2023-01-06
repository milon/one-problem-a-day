---
extends: _layouts.post
section: content
title: Minimum operations to make the array alternating
problemUrl: https://leetcode.com/problems/minimum-operations-to-make-the-array-alternating/
date: 2023-01-06
categories: [greedy, array-and-hashmap]
---

We count all the elements of odd and even positions separately and take most common 2 numbers from each group. If there is no common number, we will take the most common number from each group. Then we will count the number of operations needed to make the array alternating. The number of operations needed to make the array alternating is the number of elements that are not equal to the most common number in odd positions plus the number of elements that are not equal to the most common number in even positions.

```python
class Solution:
    def minimumOperations(self, nums: List[int]) -> int:
        if len(nums) <= 1:
            return 0
                  
        odd = [(i[1], i[0]) for i in Counter(nums[1::2]).most_common(2)]
        even = [(i[1], i[0]) for i in Counter(nums[::2]).most_common(2)]
        
        # if no repeat, then just choose the high freq
        if odd[0][1] != even[0][1]: 
            return len(nums) - odd[0][0] - even[0][0]
        
        # if have same values in both, then we have 2 scenarios to choose either.
        cand1 = len(nums) - odd[0][0] - (even[1][0] if len(even)>1 else 0)
        cand2 = len(nums) - even[0][0] - (odd[1][0] if len(odd)>1 else 0)
        
        return min(cand1, cand2)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`