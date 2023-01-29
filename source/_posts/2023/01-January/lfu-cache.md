---
extends: _layouts.post
section: content
title: LFU cache
problemUrl: https://leetcode.com/problems/lfu-cache/
date: 2023-01-29
categories: [linked-list, design]
---

We will create a hashmap to store the key-value pairs and a doubly linked list to maintain the frequency of each key. When a key is accessed, check if it exists in the hashmap. If it does, update its value and increment its frequency. If the key does not exist in the hashmap, check if the cache has reached its capacity limit. If it has, remove the least frequently used key from the head of the linked list. Add the key-value pair to the hashmap and insert it into the appropriate position in the linked list based on its frequency.

```python
class Node:
    def __init__(self, key, val):
        self.key = key
        self.val = val
        self.freq = 1
        self.prev = self.next = None

class DLinkedList:
    def __init__(self):
        self._sentinel = Node(None, None) # dummy node
        self._sentinel.next = self._sentinel.prev = self._sentinel
        self._size = 0
    
    def __len__(self):
        return self._size
    
    def append(self, node):
        node.next = self._sentinel.next
        node.prev = self._sentinel
        node.next.prev = node
        self._sentinel.next = node
        self._size += 1
    
    def pop(self, node=None):
        if self._size == 0:
            return
        
        if not node:
            node = self._sentinel.prev

        node.prev.next = node.next
        node.next.prev = node.prev
        self._size -= 1
        
        return node

class LFUCache:
    def __init__(self, capacity: int):
        self._size = 0
        self._capacity = capacity
        
        self._node = {}     # key: Node
        self._freq = collections.defaultdict(DLinkedList)
        self._minfreq = 0

    def _update(self, node):
        freq = node.freq
        
        self._freq[freq].pop(node)
        if self._minfreq == freq and not self._freq[freq]:
            self._minfreq += 1
        
        node.freq += 1
        freq = node.freq
        self._freq[freq].append(node)
    
    def get(self, key):
     
        if key not in self._node:
            return -1
        
        node = self._node[key]
        self._update(node)
        return node.val

    def put(self, key, value):
        if self._capacity == 0:
            return
        
        if key in self._node:
            node = self._node[key]
            self._update(node)
            node.val = value
        else:
            if self._size == self._capacity:
                node = self._freq[self._minfreq].pop()
                del self._node[node.key]
                self._size -= 1
                
            node = Node(key, value)
            self._node[key] = node
            self._freq[1].append(node)
            self._minfreq = 1
            self._size += 1
        

# Your LFUCache object will be instantiated and called as such:
# obj = LFUCache(capacity)
# param_1 = obj.get(key)
# obj.put(key,value)
```

Time complexity: `O(1)` <br/>
Space complexity: `O(n)`