---
extends: _layouts.post
section: content
title: Linked list random node
problemUrl: https://leetcode.com/problems/linked-list-random-node/
date: 2022-09-06
categories: [linked-list]
---

When we initialize the solution class, we will traverse the whole list and store it's values to a list. Then each time we are asked to get a random number, we will use random module to choose a value from the list and return.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def __init__(self, head: Optional[ListNode]):
        self.values = self._getValues(head)

    def getRandom(self) -> int:
        return random.choice(self.values)
    
    def _getValues(self, head: Optional[ListNode]) -> List[int]:
        values = []
        pointer = head
        
        while pointer:
            values.append(pointer.val)
            pointer = pointer.next
        return values

    
# Your Solution object will be instantiated and called as such:
# obj = Solution(head)
# param_1 = obj.getRandom()
```

Time Complexity: `O(n)` for init, `O(1)` for getRandom <br/>
Space Complexity: `O(n)`