---
extends: _layouts.post
section: content
title: Remove duplicates from sorted array II
problemUrl: https://leetcode.com/problems/remove-duplicates-from-sorted-array-ii/
date: 2022-08-29
categories: [array-and-hashmap]
---

We will iterate over the whole array from index 1 to the end-1, compare the values of 3 consecutive values, if they are same, we change the first element to 10001, as our input can be as big as 10^4. Then we sort them and count the number of element which are 10001, and return the count.

```python
class Solution:
    def removeDuplicates(self, nums: List[int]) -> int:
        for i in range(1, len(nums)-1):
            if nums[i-1] == nums[i] == nums[i+1]:
                nums[i-1] = 10001
        nums.sort()
        
        count = 0 
        for n in nums:
            if n != 10001:
                count += 1
        return count
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`